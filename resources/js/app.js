import "./bootstrap";
import "flowbite";
import '../../vendor/rappasoft/laravel-livewire-tables/resources/imports/laravel-livewire-tables-all.js';
import '../../vendor/wire-elements/modal/resources/js/modal.js';
import Swal from "sweetalert2";

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  iconColor: 'white',
  customClass: {
    popup: 'colored-toast',
  },
  showConfirmButton: false,
  timer: 4000,
  timerProgressBar: true,
})

window.Swal = Swal;
window.Alpine = Alpine;
window.Toast = Toast;

