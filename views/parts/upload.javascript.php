<div>
    <fieldset>
        <legend>hello world</legend>
        <input type="text" name="foo" id="">
        <input type="text" name="bar" id="">
        <input type="text" name="baz" id="">
        <input type="text" name="foobar" id="">
        <input type="text" name="barbaz" id="">
        <input type="file" name="videofile" id="videofile">
    </fieldset>
    <div id='dnd-elem' class="dnd">drag-n-drop</div>
    <button id="btn-to-upload">upload data</button>
</div>
<style>
    :root {
        --hello: 300px;
    }

    .dnd {
        --dim: 300px;
        --col-1: #1e4878ff;
        width: var(--dim);
        height: var(--dim);
        background-color: var(--col-1);
        margin: 19px auto;
    }
</style>
<script>
    const btn = document.getElementById('btn-to-upload');
    const dndElem = document.getElementById('dnd-elem');

    btn.addEventListener('click', async (e) => {
        const file = document.getElementById('videofile');

        console.log(file.files[0]);

        if (file.files[0] === undefined) return;

        const videoFile = file.files[0];

        const formDataInstance = new FormData();

        formDataInstance.append('myvideofile', videoFile);

        const response = await fetch('/controllers/upload.javascript.php', {
            method: 'post',
            data: formDataInstance,
        });

        console.log(response);

        try {

            const jsondata = await response.json();

            console.log(jsondata);
        } catch (err) {
            console.log('error: ', err);
        }



    });
</script>