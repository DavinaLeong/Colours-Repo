/**********************************************************************************
	- File Info -
		File name		: gulpfile.jpg
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 21 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
var gulp = require("gulp");
var clean_css = require("gulp-clean-css");
var concat = require("gulp-concat");
var sourcemaps = require("gulp-sourcemaps");
var uglify = require("gulp-uglify");
var plumber = require("gulp-plumber");
var rename = require("gulp-rename");
var babel = require("gulp-babel");
var del = require("del");
var react = require("react");
var react_dom = require("react-dom");

const NODE_PATH = "./node_modules/";
const VENDOR_PATH = "./vendor/";

const COLOUR_REPO_PATH = "./colour_repo/";
const SRC_CSS = "./colour_repo/src/css/**/*.{css}";
const SRC_JS = "./colour_repo/src/js/**/*.{js}";
const SRC_REACT = "./colour_repo/src/jsx/**/*.{jsx}";


// === Main Tasks start ===
gulp.task("default", ["watch"]);

gulp.task("watch", ["css", "js", "jsx"], function()
{
    gulp.watch("colour_repo/src/css/**/*.css", ["css"]);
    gulp.watch("colour_repo/src/js/**/*.js", ["js"]);
    gulp.watch("colour_repo/src/jsx/**/*.jsx", ["jsx"]);
});

gulp.task("dev_default", ["dev_watch"]);

gulp.task("dev_watch", ["css", "js", "dev_jsx"], function()
{
    gulp.watch("colour_repo/src/css/**/*.css", ["css"]);
    gulp.watch("colour_repo/src/js/**/*.js", ["js"]);
    gulp.watch("colour_repo/src/jsx/**/*.jsx", ["dev_jsx"]);
});

gulp.task("dev_watch_jsx", function()
{
    return gulp.watch(COLOUR_REPO_PATH + "src/jsx/**/*.{jsx}", ["dev_jsx"]);
});
// === Main Tasks end ===

// === Manage Vendor Resources start ===
gulp.task("copy_vendor", function()
{
	console.log("--- task: copy_vendor STARTED ---");
    // --- Twitter Bootstrap start ---
    gulp.src([
        NODE_PATH + "bootstrap/dist/css/bootstrap.min.css",
        NODE_PATH + "bootstrap/dist/css/bootstrap.min.css.map"
    ]).pipe(gulp.dest(VENDOR_PATH + "bootstrap/css"));
    gulp.src([
        NODE_PATH + "bootstrap/dist/fonts/**"
    ]).pipe(gulp.dest(VENDOR_PATH + "bootstrap/fonts"));
    gulp.src([
        NODE_PATH + "bootstrap/dist/js/bootstrap.min.js"
    ]).pipe(gulp.dest(VENDOR_PATH + "bootstrap/js"));
    console.log("Copied Bootstrap files.");
    // --- Twitter Bootstrap end ---


    // --- Font-Awesome start ---
    gulp.src([
        NODE_PATH + "font-awesome/css/**",
        "!" + NODE_PATH + "font-awesome/css/font-awesome.css"
    ]).pipe(gulp.dest(VENDOR_PATH + "font-awesome/css"));

    gulp.src([
        NODE_PATH + "font-awesome/fonts/**"
    ]).pipe(gulp.dest(VENDOR_PATH + "font-awesome/fonts"));
    console.log("Copied Font-Awesome files.");
    // --- Font-Awesome end ---


    // --- jQuery end ---
    gulp.src([
        NODE_PATH + "jquery/dist/jquery.min.js",
        NODE_PATH + "jquery/dist/jquery.min.map"
    ]).pipe(gulp.dest(VENDOR_PATH + "jquery"));
    console.log("Copied jQuery files.");
    // --- jQuery end ---


    // --- Numeral end ---
    gulp.src([
        NODE_PATH + "numeral/min/numeral.min.js"
    ]).pipe(gulp.dest(VENDOR_PATH + "numeral"));
    console.log("Copied Numeral files.");
    // --- Numeral end ---


    // --- ParsleyJS end ---
    gulp.src([
        NODE_PATH + "parsleyjs/dist/parsley.min.js",
        NODE_PATH + "parsleyjs/dist/parsley.min.js.map"
    ]).pipe(gulp.dest(VENDOR_PATH + "parsleyjs"));
    console.log("Copied ParsleyJs files.");
    // --- ParsleyJS end ---


    // --- PrismJS end ---
    gulp.src([
        NODE_PATH + "prismjs/**"
    ]).pipe(gulp.dest(VENDOR_PATH + "prismjs"));
    console.log("Copied PrismJS files.");
    // --- PrismJS end ---

    // --- React start ---
    gulp.src([
        NODE_PATH + "react/dist/**.min.js",
        NODE_PATH + "react-dom/dist/**.min.js"
    ]).pipe(gulp.dest(VENDOR_PATH + "react"));
    console.log("Copied React files");
    // --- React end ---
	console.log("--- task: copy_vendor ENDED ---");
});

gulp.task("delete_vendor", function()
{
    console.log("--- task: delete_vendor STARTED ---");

    del.sync([
        VENDOR_PATH + "bootstrap/**",
        VENDOR_PATH + "font-awesome/**",
        VENDOR_PATH + "jquery/**",
        VENDOR_PATH + "numeral/**",
        VENDOR_PATH + "parsleyjs/**",
        VENDOR_PATH + "react/**"
    ]);

    console.log("--- task: delete_vendor ENDED ---");
});

gulp.task("update_vendor", ["delete_vendor", "copy_vendor"]);
// === Manage Vendor Resources end ===

// === Colour Repo Resources end ===
gulp.task("css", function()
{
    console.log("--- task: css STARTED ---");
    // --- All css but Debug, Login and Sign Up start ---
    gulp.src([
            COLOUR_REPO_PATH + "src/css/**.css",
            "!" + COLOUR_REPO_PATH + "src/css/cr_styles_login.css",
            "!" + COLOUR_REPO_PATH + "src/css/cr_styles_signup.css",
            "!" + COLOUR_REPO_PATH + "src/css/cr_styles_debug.css"
        ])
        .pipe(clean_css({compatibility: "ie8"}))
        .pipe(concat("cr_styles.min.css"))
        .pipe(gulp.dest(COLOUR_REPO_PATH + "dist/css"));
    console.log("Minified and Concatenated css ~");
    // --- All css but Debug, Login and Sign Up end ---

    // --- Signup start ---
    gulp.src(COLOUR_REPO_PATH + "src/css/cr_styles_signup.css")
        .pipe(clean_css({compatibility: "ie8"}))
        .pipe(rename({suffix: ".min"}))
        .pipe(gulp.dest(COLOUR_REPO_PATH + "dist/css"));
    console.log("Minified 'cr_styles_signup.css' ~");
    // --- Signup end ---

    // --- Login start ---
    gulp.src(COLOUR_REPO_PATH + "src/css/cr_styles_login.css")
        .pipe(clean_css({compatibility: "ie8"}))
        .pipe(rename({suffix: ".min"}))
        .pipe(gulp.dest(COLOUR_REPO_PATH + "dist/css"));
    console.log("Minified 'cr_styles_login.css' ~");
    // --- Login end ---

    // --- Debug start ---
    gulp.src(COLOUR_REPO_PATH + "src/css/cr_styles_debug.css")
        .pipe(clean_css({compatibility: "ie8"}))
        .pipe(rename({suffix: ".min"}))
        .pipe(gulp.dest(COLOUR_REPO_PATH + "dist/css"));
    console.log("Minified 'cr_styles_debug.css' ~");
    // --- Debug end ---
    console.log("--- task: css ENDED ---");
});

gulp.task("js", function(cb)
{
    console.log("--- task: js STARTED ---");
    // --- Clock start ---
    gulp.src(COLOUR_REPO_PATH + "src/js/**.js")
        .pipe(plumber({errorHandler:function(err) {
            console.log(err);
        }}))
        .pipe(uglify())
        .pipe(sourcemaps.write())
        .pipe(rename({suffix: ".min"}))
        .pipe(gulp.dest(COLOUR_REPO_PATH + "dist/js"));
    console.log("Uglified 'cr-clock.js.'");
    // -- Clock end ---
    console.log("--- task: js ENDED ---");
});

gulp.task("jsx", function()
{
    console.log("--- task: jsx STARTED ---");
    gulp.src(COLOUR_REPO_PATH + "src/react/**.jsx")
        .pipe(plumber({errorHandler:function(err) {
            console.log(err);
        }}))
        .pipe(babel({
            "presets":["es2015", "react"],
            "plugins":["syntax-object-rest-spread"]
        }))
        .pipe(uglify())
        .pipe(gulp.dest(COLOUR_REPO_PATH + "dist/react/"));
    console.log("--- task: jsx ENDED ---");
});

gulp.task("dev_jsx", function()
{
    console.log("--- task: dev_jsx STARTED ---");
    gulp.src(COLOUR_REPO_PATH + "src/react/**.jsx")
        .pipe(sourcemaps.init())
        .pipe(plumber({errorHandler:function(err) {
            console.log(err);
        }}))
        .pipe(babel({
            "presets":["es2015", "react"],
            "plugins":["syntax-object-rest-spread"]
        }))
        .pipe(uglify())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(COLOUR_REPO_PATH + "dist/jsx/"));
    console.log("--- task: dev_jsx ENDED ---");
});

gulp.task("delete", function()
{
    console.log("--- task: delete STARTED ---");

    del.sync([
        COLOUR_REPO_PATH + "dist/**",
        "!" + COLOUR_REPO_PATH + "dist"
    ]);

    console.log("--- task: delete ENDED ---");
});
// === Colour Repo Resources end ===
