<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Employees</title>
</head>
<body>
<?php if ($_SERVER['REQUEST_METHOD'] == "GET") { ?>
    <h1>Заполните данные сотрудника</h1>
    <div class="col-md-5">
        <form method="POST">
            <div class="form-group">
                <label for="last-name">Фамилия</label>
                <input class="form-control" type="text" id="last-name" name="last_name" required="">
            </div>
            <div class="form-group">
                <label for="first-name">Имя</label>
                <input class="form-control" type="text" id="first-name" name="first_name" required="">
            </div>
            <div class="form-group">
                <label for="patronymic">Отчество</label>
                <input class="form-control" type="text" id="patronymic" name="patronymic" required="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                       placeholder="Email должен соответствовать шаблону email@org.by" name="email" required="">
            </div>
            <div class="form-group">
                <label for="room">Помещение</label>
                <input class="form-control" type="number" id="room" name="room" required="">
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input class="form-control" type="tel" id="phone"
                       placeholder="Несколько номеров добавляйте через запятую" name="phone" required="">
            </div>
            <button type="submit" class="btn btn-primary">Внести в базу</button>
        </form>
    </div>
<?php } else {
    //echo "Form is gone";
} ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>
</html>