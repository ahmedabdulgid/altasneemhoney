var gulp = require("gulp"),
  concat = require("gulp-concat"),
  autoprefixer = require("gulp-autoprefixer"),
  sass = require("gulp-sass"),
  uglify = require("gulp-uglify"),
  notify = require("gulp-notify"),
  imagemin = require("gulp-imagemin"),
  rollup = require("gulp-better-rollup"),
  babel = require("rollup-plugin-babel"),
  resolve = require("rollup-plugin-node-resolve"),
  commonjs = require("rollup-plugin-commonjs"),
  del = require("del"),
  rtlcss = require("gulp-rtlcss"),
  rename = require("gulp-rename"),
  browsersync = require("browser-sync"),
  fileinclude = require("gulp-file-include"),
  sourcemaps = require("gulp-sourcemaps");

// Paths
var nameTheme = "altasneem";
(inputDir = "./wp-content/themes/" + nameTheme + "/assets/src/"),
  (outputDir = "./wp-content/themes/" + nameTheme + "/assets/dist/"),
  (paths = {
    html: inputDir + "*.html",
    css: inputDir + "*.css",
    sass: inputDir + "scss/*.scss",
    js: inputDir + "js/app.js",
    fonts: inputDir + "fonts/**",
    images: inputDir + "images/**/*.{JPG,jpg,png,gif,svg}",
  });

// cleaning the dist directory
function clean(done) {
  del.sync(outputDir);
  done();
}

// Sass Task
gulp.task("sass", () => {
  return (
    gulp
      .src(paths.sass)
      .pipe(sass().on("error", sass.logError))
      .pipe(autoprefixer("last 2 versions"))
      .pipe(concat("app.css"))
      .pipe(rename({ suffix: ".min" }))
      // .pipe(sourcemaps.write())
      .pipe(gulp.dest(outputDir + "css/"))
      .pipe(sass().on("error", sass.logError))
      .pipe(autoprefixer("last 2 versions"))
      .pipe(concat("app.css"))
      .pipe(rtlcss())
      .pipe(rename({ suffix: "-rtl" }))
      .pipe(rename({ suffix: ".min" }))
      // .pipe(sourcemaps.write())
      .pipe(gulp.dest(outputDir + "css/"))
      .pipe(notify("Sass Task Done"))
  );
});

// Fonts Task
gulp.task("fonts", () => {
  return gulp.src(paths.fonts).pipe(gulp.dest(outputDir + "fonts/"));
});

// Images Task
gulp.task("images", () => {
  return gulp
    .src(paths.images)
    .pipe(
      imagemin([
        imagemin.gifsicle({ interlaced: true }),
        imagemin.mozjpeg({ progressive: true }),
        imagemin.optipng({ optimizationLevel: 5 }),
      ])
    )
    .pipe(gulp.dest(outputDir + "images/"));
});

// Scripts Task
gulp.task("scripts", () => {
  return gulp
    .src(paths.js)
    .pipe(concat("app.js"))
    .pipe(rollup({ plugins: [babel(), resolve(), commonjs()] }, "umd"))
    .pipe(uglify())
    .pipe(rename({ suffix: ".min" }))
    .pipe(gulp.dest(outputDir + "js/"))
    .pipe(notify("Script Task Done"))
}); // Scripts Task

// Watch Task
gulp.task("watch", () => {
  gulp.watch(paths.images, gulp.series("images"));
  gulp.watch(paths.fonts, gulp.series("fonts"));
  gulp.watch(paths.sass, gulp.series("sass"));
  gulp.watch(paths.js, gulp.series("scripts"));
});

gulp.task(
  "build",
  gulp.series(clean, "sass", "scripts", "fonts", "images", "watch")
);
