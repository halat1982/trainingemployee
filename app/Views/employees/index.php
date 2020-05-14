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
<h2>Сотрудники</h2>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Фамилия</th>
        <th scope="col">Имя</th>
        <th scope="col">Отчество</th>
        <th scope="col">Кабинет</th>
        <th scope="col">email</th>
        <th scope="col">Телефон</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($user as $k => $u): ?>
        <tr>
            <th scope="row"><?php echo $k + 1 ?></th>
            <td><?php echo $u->last_name ?></td>
            <td><?php echo $u->first_name ?></td>
            <td><?php echo $u->patronymic ?></td>
            <td><?php echo $u->room ?></td>
            <td><?php echo $u->email ?></td>
            <td><?php echo $u->phone_numbers ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<button type="button" class="btn btn-secondary" onclick="location.href='employees/add'">Добавить сотрудника</button>
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