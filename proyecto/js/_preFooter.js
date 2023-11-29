const footerMessage = document.getElementById('top-bar').querySelector('p');

if (footerMessage) {

    const messageContainer = document.getElementById('topMessage');

    if (messageContainer) {
        const message = document.getElementById('top-bar').querySelector('p').textContent;

        messageContainer.innerHTML = `
            <marquee behavior="" direction="">${message}</marquee>
        `;

        console.log(message);
    }
}
