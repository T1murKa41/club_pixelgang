<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <a href="" name="downlist">Открыть/закрыть</a>
    <div id="downlist" style="display:none">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis ab 
            ratione magni temporibus repudiandae? Laboriosam odit vel totam molestiae, 
            praesentium tempora reprehenderit ea accusamus reiciendis quod perferendis saepe repudiandae velit!</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $('a[name=downlist]').click(function() {
            $('#downlist').slideToggle(500);
            return false; /* чтобы страница не перезагружалась при нажатии */
        });
    </script>
</body>

</html>