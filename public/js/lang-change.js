const langIcons = document.querySelectorAll("[lang-btn]")
langIcons.forEach(item => {
    item.addEventListener('click', function(){
        $.ajax({
            type: "POST",
            url: "/session/lang",
            data: {lang: item.attributes[2].value},
            success: function(result){
                console.log(result)
                location.reload()
            },
            error: function(err){
                console.log(err)
            }
        })
    })
})