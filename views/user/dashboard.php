<style>
    .card {
        display: inline-block;
        background: white;
        box-sizing: border-box;
        width: 300px;
        height: 150px;
        margin-top: 8px;
        margin-left: 8px;
        margin-right: -8px;
        padding: 16px;
        border-radius: 2px;
        font-family: 'Roboto', sans-serif;
        color: black;
    }
    

</style>

<script>
    $("paper-spinner").attr("active","false");
    var container = document.querySelector('#container');
    var msnry = new Masonry(container, {
        // options
        columnWidth: 310,
        itemSelector: '.card'
    });



</script>
<paper-shadow class="main-card">
                Days to expiry : 20

                <br>
                <paper-progress value="20" min="0" max="30"></paper-progress>

            </paper-shadow>
            <paper-shadow class="main-card">
                Number of slaves : 2

                <br>
                <paper-progress value="2" min="0" max="100"></paper-progress>

            </paper-shadow>