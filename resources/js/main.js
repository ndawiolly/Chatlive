const input = document.getElementById('preloadInput');
const display = document.getElementById('preloadDisplay');


input.addEventListener('change' , e => {
    let image = input.files[0];
    image = URL.createObjectURL(image);

    display.innerHTML = `
        <label for="preloadInput">
            <img src="${image}" class="img-fluid preloadImage" />
        </label>
    `;
})


