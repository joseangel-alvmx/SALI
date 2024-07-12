import '../sass/tabler.scss';
import './bootstrap';
import './tabler-init';
import 'bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js';
import 'bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css';
import 'bootstrap';
// Configuración del idioma español
$.fn.datepicker.dates['es'] = {
    days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
    daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
    daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
    today: "Hoy",
    clear: "Borrar",
    format: "dd/mm/yyyy",
    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
    weekStart: 1
};
$(document).ready(function () {
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        language: 'es'
    });
});
$('.dropdown-menu').on('click', function (e) {
    e.stopPropagation();
});
$(document).ready(function () {
    $(document).on('click', function (event) {
        var $dropdown = $('.dropdown-checkboxes');
        if (!$dropdown.is(event.target) && $dropdown.has(event.target).length === 0) {
            event.stopPropagation();
        }
    });

    $('.dropdown-checkboxes').on('hide.bs.dropdown', function (event) {
        if ($(event.relatedTarget).closest('.dropdown-checkboxes').length) {
            event.preventDefault();
        }
    });
});
$('#modal-confirm-convert').on('hidden.bs.modal', function (e) {
    location.reload();
});
function unsecuredCopyToClipboard(text) {
    const textArea = document.createElement("textarea");
    textArea.value = text;
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    try {
        document.execCommand('copy');
    } catch (err) {
        console.error('Unable to copy to clipboard', err);
    }
    document.body.removeChild(textArea);
}
$(document).ready(function () {
    $('#exportButton').on('click', function () {
        $('#spinner, #spinner-footer').removeClass('d-none');
    });
    $('#aplicar-registro-modal').modal({
        backdrop: 'static',
        keyboard: false
    });
});