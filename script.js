$(document).ready(function () {
    $('#name-submit').on('click', function(){
        var nome = $('#name').val();        
        if ($.trim(nome) !== ''){
            $.post('name.php',{name: nome},function(data) {
                $('#name-data').text(data)
            });
        }
    });
});