const element = document.getElementById('main-button');

element.addEventListener('click', () => {

    fetch('handler.php', {
        body: '',
        method: 'post',
    }).then(response => {
        const text = response.text();
        
        return text;
    }).then(text => {
        
        alert(text);
    });

});