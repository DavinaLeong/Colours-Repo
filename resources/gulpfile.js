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

const NODE_PATH = './node_modules/';
const VENDOR_PATH = './vendor/';

// Copy packages to vendor folder
gulp.task('copy', function()
{
	console.log('--- task: copy STARTED ---');
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
	console.log('--- task: copy ENDED ---');
});

gulp.task('minify-css', function()
{

});