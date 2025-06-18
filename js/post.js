document.addEventListener("DOMContentLoaded", function () {
    const btn = document.getElementById("post-btn");

    btn.addEventListener("click", function () {
        const text = document.getElementById("post-text").value;
        const image = document.getElementById("post-image").files[0];

        const formData = new FormData();
        formData.append("text", text);
        if (image) {
            formData.append("image", image);
        }

        fetch("save_post.php", {
            method: "POST",
            body: formData
        }).then(response => response.text())
          .then(data => {
              alert(data); 
              location.reload(); 
          });
    });
});
