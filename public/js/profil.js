function previewImage() {
    const preview = document.getElementById('preview');
    const file = document.getElementById('image').files[0];
    const reader = new FileReader();

    reader.addEventListener("load", function () {

      preview.src = reader.result;
    }, false);

    if (file) {
      reader.readAsDataURL(file);
    }
  }

function showAlert(){
    alert("Profil Berhasil diubah")
}
