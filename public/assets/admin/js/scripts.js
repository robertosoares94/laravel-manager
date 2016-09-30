$(document).ready(function(){
    $(".delete").on("submit", function(){
        return confirm("Deseja realmente deletar este item?");
    });
});
