$('.form-js-label').find('input').on('input', function (e) {
    $(e.currentTarget).attr('data-empty', !e.currentTarget.value);
  });

const info = document.querySelector(".alert-info");

$('#phone').on('change', function() {
 event.preventDefault();

 const phoneNumber = phoneInput.getNumber();

 info.style.display = "";
// info.removeAttribute('hidden');
 info.innerHTML = `Numeris teisingoje formoje turi atrodyti šitaip: <strong>${phoneNumber}</strong>`;
});

