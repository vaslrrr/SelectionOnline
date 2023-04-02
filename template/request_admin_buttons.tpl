<div class="row">
    <div class="col-4"></div>
    <div class="col-4 "><input name="" class="rounded-input" type="text" placeholder="ФИО" style="width:100%;"
                               value="%NAME%" READONLY/></div>
    <div class="col-4"></div>
</div>
<div class="row" style="margin-top: 0.7%;">
    <div class="col-4"></div>
    <div class="col-4 "><input name="" class="rounded-input" type="email" placeholder="Почта" style="width:100%;"
                               value="%EMAIL%" READONLY/>
    </div>
    <div class="col-4"></div>
</div>
<div class="row" style="margin-top: 0.7%;">
    <div class="col-4"></div>
    <div class="col-4 "><input name="" class="rounded-input" type="text" placeholder="СНИЛС" style="width:100%;"
                               value="%SNILS%" READONLY/>
    </div>
    <div class="col-4"></div>
</div>
<div class="row" style="margin-top: 0.7%;">
    <div class="col-4"></div>
    <div class="col-4"><input READONLY name="" class="rounded-input" type="number" placeholder="Общая сумма баллов"
                              style="width:60%; margin-left: 15%;" value="%TOTAL%"/></div>
    <div class="col-4"></div>
</div>
%SUBJECTS%
<div class="row" style="margin-top: 0.7%;">
    <div class="col-4"></div>
    <div class="col-4 ">Скан. паспорта: <a href="get_image.php?id=%ID%&type=passport" target="_blank"
                                           class="btn btn-warning">Просмотр</a></div>
    <div class="col-4"></div>
</div>
<div class="row" style="margin-top: 0.7%;">
    <div class="col-4"></div>
    <div class="col-4 ">СНИЛС: <a href="get_image.php?id=%ID%&type=snils" target="_blank" class="btn btn-warning">Просмотр</a>
    </div>
    <div class="col-4"></div>
</div>
<div class="row" style="margin-top: 0.7%;">
    <div class="col-4"></div>
    <div class="col-4 ">Диплом: <a href="get_image.php?id=%ID%&type=graduate" target="_blank" class="btn btn-warning">Просмотр</a>
    </div>
    <div class="col-4"></div>
</div>
<div class="row" style="margin-top: 0.7%;">
    <div class="col-4"></div>
    <div class="col-4 ">Результаты ЕГЭ: <a href="get_image.php?id=%ID%&type=results" target="_blank"
                                           class="btn btn-warning">Просмотр</a></div>
    <div class="col-4"></div>
</div>
<div class="row" style="margin-top: 0.7%;">
    <div class="col-4"></div>
    <div class="col-4 "><input name="" class="rounded-input" type="text" placeholder="Статус" style="width:100%;"
                               value="%STATUS%" READONLY/>
    </div>
    <div class="col-4"></div>
</div>
<div class="row" style="margin-top: 0.7%;">
    <div class="col-4"></div>
    <div class="col-4 "><a href="request_admin.php?id=%ID%&approve" class="btn btn-success btn-rounded"
                           style="width: 40%;">Одобрить</a><a href="request_admin.php?id=%ID%&decline"
                                                              class="btn btn-danger btn-rounded"
                                                              style="width: 40%; margin-left: 19%;">Отказать</a>
    </div>
    <div class="col-4"></div>
</div>
<div class="row" style="margin-top: 0.7%;">
    <div class="col-4"></div>
    <div class="col-4 ">
        <a href="list_admin.php"
           class="btn btn-warning" style="width: 40%; margin-left: 30%;">К списку заявлений</a>
    </div>
    <div class="col-4"></div>
</div>