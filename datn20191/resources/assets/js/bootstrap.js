window._ = require('lodash');
window.Popper = require('popper.js').default;
/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    error: function (jqXHR, textStatus, errorThrown) {
        if (jqXHR.status === 403) {
            var msg = "message: " + jqXHR.responseJSON.message + "\n" + "code: " + jqXHR.responseJSON.code;
            alert(msg);
        }else {
            alert(textStatus);
        }
    }
});

require('./student.js');
// require('./timetable.js');
require('./registration_class.js');
require('./timetable_student.js');
require('./notification.js');
// require('./rollcall.js');
require('./achievement.js');
require('./holiday.js');
require('./course.js');
require('./classes.js');
require('./teacher.js');
require('./examination.js');
require('./staff.js');
require('./teacher_class.js');
require('./classroom.js');
require('./training.js');
require('./revenue.js');
require('./feedback.js');


try {
    window.$ = window.jQuery = require('jquery');
    require('bootstrap');
} catch (e) {}
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
// import Echo from 'laravel-echo'
// window.Pusher = require('pusher-js');
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });