/**********************************************************************************
	- File Info -
		File name		: gulpfile.jpg
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 21 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
var gulp = require('gulp');
var clean_css = require('gulp-clean-css');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglify');
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');

const NODE_PATH = './node_modules/';
const VENDOR_PATH = './vendor/';
const COLOUR_REPO_PATH = './colour_repo/';

// Copy packages to vendor folder
gulp.task('copy_vendor', function()
{
	console.log('--- task: copy_vendor STARTED ---');
    // --- Twitter Bootstrap start ---
    gulp.src([
        NODE_PATH + 'bootstrap/dist/css/bootstrap.min.css',
        NODE_PATH + 'bootstrap/dist/css/bootstrap.min.css.map'
    ]).pipe(gulp.dest(VENDOR_PATH + 'bootstrap/css'));
    gulp.src([
        NODE_PATH + 'bootstrap/dist/fonts/**'
    ]).pipe(gulp.dest(VENDOR_PATH + 'bootstrap/fonts'));
    gulp.src([
        NODE_PATH + 'bootstrap/dist/js/bootstrap.min.js'
    ]).pipe(gulp.dest(VENDOR_PATH + 'bootstrap/js'));
    console.log('Finished copying Bootstrap files.');
    // --- Twitter Bootstrap end ---


    // --- Font-Awesome start ---
    gulp.src([
        NODE_PATH + 'font-awesome/css/**',
        '!' + NODE_PATH + 'font-awesome/css/font-awesome.css'
    ]).pipe(gulp.dest(VENDOR_PATH + 'font-awesome/css'));

    gulp.src([
        NODE_PATH + 'font-awesome/fonts/**'
    ]).pipe(gulp.dest(VENDOR_PATH + 'font-awesome/fonts'));
    console.log('Finished copying Font-Awesome files.');
    // --- Font-Awesome end ---


    // --- jQuery end ---
    gulp.src([
        NODE_PATH + 'jquery/dist/jquery.min.js',
        NODE_PATH + 'jquery/dist/jquery.min.map'
    ]).pipe(gulp.dest(VENDOR_PATH + 'jquery'));
    console.log('Finished copying jQuery files.');
    // --- jQuery end ---


    // --- Numeral end ---
    gulp.src([
        NODE_PATH + 'numeral/min/numeral.min.js'
    ]).pipe(gulp.dest(VENDOR_PATH + 'numeral'));
    console.log('Finished copying Numeral files.');
    // --- Numeral end ---


    // --- ParsleyJS end ---
    gulp.src([
        NODE_PATH + 'parsleyjs/dist/parsley.min.js',
        NODE_PATH + 'parsleyjs/dist/parsley.min.js.map'
    ]).pipe(gulp.dest(VENDOR_PATH + 'parsleyjs'));
    console.log('Finished copying ParsleyJs files.');
    // --- ParsleyJS end ---
	console.log('--- task: copy_vendor ENDED ---');
});

gulp.task('styles', function()
{

});

gulp.task('scripts', function(cb)
{
    console.log('--- task: scripts STARTED ---');
    // --- Clock start ---
    gulp.src(COLOUR_REPO_PATH + 'src/js/**.js')
        .pipe(plumber({errorHandler:function(err) {
            console.log(err);
        }}))
        .pipe(uglify())
        .pipe(sourcemaps.write())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(COLOUR_REPO_PATH + 'dist/js'));
    console.log('Uglified "cr-clock.js."');
    // -- Clock end ---
    console.log('--- task: scripts ENDED ---');
});

gulp.task('dev-scripts', function(cb)
{
    console.log('--- task: scripts STARTED ---');
    // --- Clock start ---
    gulp.src(COLOUR_REPO_PATH + 'src/js/**')
        .pipe(sourcemaps.int())
        .pipe(plumber({errorHandler:function(err) {
            console.log(err);
        }}))
        .pipe(uglify())
        .pipe(sourcemaps.write())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(COLOUR_REPO_PATH + 'dist/js'));
    console.log('Uglified "cr-clock.js."');
    // -- Clock end ---
    console.log('--- task: scripts ENDED ---');
});