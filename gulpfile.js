var gulp = require('gulp')
var runSequence = require('run-sequence')
var connect = require('gulp-connect') //构建本地web服务器
var less = require('gulp-less') //less编译
var sourcemaps = require('gulp-sourcemaps')
var cssmin = require('gulp-clean-css') //css压缩
var uglify = require('gulp-uglify') //js压缩
var concat = require('gulp-concat') //文件合并
var rename = require('gulp-rename') //文件更名
var webpack = require("gulp-webpack")

var dir = './resources/front/'
var diro = './public/front/'

var webpackConfig = require('./resources/' + dir + '/webpack.config.js')

gulp.task("webpack", function () {
    return gulp.src(dir + 'app.js')
        .pipe(webpack(webpackConfig))
        .pipe(gulp.dest(diro + 'js'))
        .pipe(connect.reload())
})

gulp.task('min-css', function () {
    gulp.src([diro + 'css/*.css', '!' + diro + 'css/*.min.css'])
        .pipe(cssmin({
            compatibility: 'ie7' //兼容IE7及以下需设置compatibility属性
        }))
        .pipe(rename({
            suffix: ".min",
        }))
        .pipe(gulp.dest(diro + 'css'))
})

gulp.task('min-js', function () {
    return gulp.src([diro + 'js/*.js', '!' + diro + 'js/*.min.js'])
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(uglify())
        .pipe(gulp.dest(diro + 'js'))
})

gulp.task('less', function () {
    gulp.src(dir + 'less/*.less')
        .pipe(less())
        .pipe(gulp.dest(diro + 'css'))
        .pipe(connect.reload())
})

gulp.task('web', function (cb) {
    runSequence('webpack', 'less', ['min-css', 'min-js'], cb);
});

gulp.task('connect', function () {
    connect.server({
        port: 3000,
        livereload: true
    })
})

gulp.task('watch', function () {
    gulp.watch([dir + 'less/*.less', dir + 'components/forms/*.less'], ['less'])
    gulp.watch(['app/html/*', 'app/layout/*.html'], ['html'])
    gulp.watch([
        dir + 'app.js',
        dir + 'global.js',
        dir + 'pages/*.js',
        dir + 'layout/*.js',
        dir + 'components/**/*.js'
    ], ['webpack'])
})

gulp.task('default', ['connect', 'watch'])
