const gulp = require("gulp");
const dartSass = require("sass");
const sass = require("gulp-sass")(dartSass);
const concat = require("gulp-concat");
const uglify = require("gulp-uglify");
const sourcemaps = require("gulp-sourcemaps");
const plumber = require("gulp-plumber");
const eslint = require("gulp-eslint");
const prettier = require("gulp-prettier");

// Paths
const paths = {
  scss: "./assets/scss/**/*.scss",
  js: "./assets/js/**/*.js",
  cssDest: "./dist/css",
  jsDest: "./dist/js",
};

// SCSS Task
gulp.task("scss", function () {
    return gulp
      .src("./assets/scss/main.scss")
      .pipe(plumber())
      .pipe(sourcemaps.init())
      .pipe(
        sass({
          outputStyle: "compressed",
          quietDeps: true, // hides deprecation warnings from node_modules
          silenceDeprecations: ["import"],
          includePaths: ["./assets/scss"]
        }).on("error", sass.logError)
      )
      .pipe(sourcemaps.write("."))
      .pipe(gulp.dest(paths.cssDest));
  });

// JS Task
gulp.task("js", function () {
  return gulp
    .src([
      './node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', // Bootstrap first
      './assets/js/**/*.js' // Then your custom JS
    ])
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(concat("main.js"))
    .pipe(uglify())
    .pipe(sourcemaps.write("."))
    .pipe(gulp.dest(paths.jsDest));
});

// Lint Tasks
gulp.task("lint-js", function () {
  return gulp
    .src(["assets/js/**/*.js", "!assets/js/**/*.min.js"])
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError());
});

gulp.task("lint-css", function () {
  // Stylelint is run via npm script directly
  console.log("Run 'npm run lint:css' to lint CSS/SCSS files");
});

// Format Tasks
gulp.task("format-js", function () {
  return gulp
    .src(["assets/js/**/*.js", "!assets/js/**/*.min.js"])
    .pipe(prettier())
    .pipe(gulp.dest("assets/js"));
});

gulp.task("format-css", function () {
  return gulp
    .src("assets/scss/**/*.scss")
    .pipe(prettier())
    .pipe(gulp.dest("assets/scss"));
});

gulp.task("format", gulp.series("format-js", "format-css"));

// Build Task
gulp.task("build", gulp.series("scss", "js"));

// Watch Task
gulp.task("watch", function () {
  gulp.watch(paths.scss, gulp.series("scss"));
  gulp.watch(paths.js, gulp.series("js"));
});

// Default Task
gulp.task("default", gulp.series("scss", "js", "watch"));
