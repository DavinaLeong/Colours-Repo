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
var del = require("del");

const NODE_PATH = "./node_modules/";
const VENDOR_PATH = "./vendor/";
const COLOUR_REPO_PATH = "./colour_repo/";

// === Main Tasks start ===
gulp.task("default", ["update_vendor", "update", "watch"]);

gulp.task("watch", ["watch_styles", "watch_scripts"]);

gulp.task("watch_styles", function()
{
    return gulp.watch(COLOUR_REPO_PATH + "src/css", ["styles"]);
});

gulp.task("watch_scripts", function()
{
    return gulp.watch(COLOUR_REPO_PATH + "src/js", ["scripts"]);
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
	console.log("--- task: copy_vendor ENDED ---");
});

gulp.task("delete_vendor", function()
{
    console.log("--- task: delete_vendor STARTED ---");

    del.sync([
        VENDOR_PATH + "/bootstrap/**",
        VENDOR_PATH + "/font-awesome/**",
        VENDOR_PATH + "/jquery/**",
        VENDOR_PATH + "/numeral/**",
        VENDOR_PATH + "/parsleyjs/**"
    ]);

    console.log("--- task: delete_vendor ENDED ---");
});

gulp.task("update_vendor", ["delete_vendor", "copy_vendor"]);
// === Manage Vendor Resources end ===

// === Colour Repo Resources end ===
gulp.task("styles", function()
{
    console.log("--- task: styles STARTED ---");
    // --- All Styles but Debug start ---
    gulp.src([
            COLOUR_REPO_PATH + "src/css/**.css",
            "!" + COLOUR_REPO_PATH + "src/css/cr_styles_login.css",
            "!" + COLOUR_REPO_PATH + "src/css/cr_styles_debug.css"
        ])
        .pipe(clean_css({compatibility: "ie8"}))
        .pipe(concat("cr_styles.min.css"))
        .pipe(gulp.dest(COLOUR_REPO_PATH + "dist/css"));
    console.log("Minified and Concatenated Styles ~");
    // --- All Styles but Debug end ---

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
    console.log("--- task: styles ENDED ---");
});

gulp.task("scripts", function(cb)
{
    console.log("--- task: scripts STARTED ---");
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
    console.log("--- task: scripts ENDED ---");
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

gulp.task("update", ["delete", "styles", "scripts"]);
// === Colour Repo Resources end ===
