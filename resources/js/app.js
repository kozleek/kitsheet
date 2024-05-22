import './bootstrap';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import persist from "@alpinejs/persist";
import tippy from 'tippy.js';
import ClipboardJS from 'clipboard';
import 'tippy.js/dist/tippy.css'; // optional for styling
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

Livewire.start();

toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "300",
    "timeOut": "2000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

document.addEventListener('DOMContentLoaded', function () {
    if (window.flashMessage) {
        const { type, message } = window.flashMessage;
        toastr[type](message);
    }
});

tippy('[data-tippy-content]');
new ClipboardJS('[data-clipboard-text]');

window.printThis = function (url) {
    // create an iframe and hide it
    var iframe = document.createElement('iframe');
    iframe.style.display = 'none';
    document.body.appendChild(iframe);

    // set the src of the iframe to the url of the page you want to print
    iframe.src = url;

    // wait for the page to load and print it
    iframe.onload = function () {
        iframe.contentWindow.print();
    };
}
