<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col text-center">Заполните данные для подачи заявки на поступление:</div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 "><input name="name" class="rounded-input" type="text" placeholder="ФИО" style="width:100%;"
                                   required/>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row" style="margin-top: 0.7%;">
        <div class="col-4"></div>
        <div class="col-4 "><input name="email" class="rounded-input" type="email" placeholder="Почта"
                                   style="width:100%;" required/>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row" style="margin-top: 0.7%;">
        <div class="col-4"></div>
        <div class="col-4 "><input name="snils" class="rounded-input" type="text" placeholder="№ СНИЛС"
                                   style="width:100%;" required/>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row" style="margin-top: 0.7%;">
        <div class="col-4"></div>
        <div class="col-4"><input READONLY id="total" class="rounded-input" type="number"
                                  placeholder="Общая сумма баллов"
                                  style="width:60%; margin-left: 15%;" value="0"/></div>
        <div class="col-4"></div>
    </div>
    <div class="row" style="margin-top: 0.7%;">
        <div class="col-4"></div>
        <div class="col-4 "><input name="subject[]" class="rounded-input" type="text" placeholder="Предмет"
                                   style="width:60%;" required/>
            <input name="mark[]" class="rounded-input align-self-end" type="number" placeholder="Кол-во"
                   style="width:30%; margin-left: 5%;" value="0" onkeyup="recalc()" id="F" required min="0" max="100"/>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row" style="margin-top: 0.7%;">
        <div class="col-4"></div>
        <div class="col-4 "><input name="subject[]" class="rounded-input" type="text" placeholder="Предмет"
                                   style="width:60%;" required/>
            <input name="mark[]" class="rounded-input align-self-end" type="number" placeholder="Кол-во"
                   style="width:30%; margin-left: 5%;" value="0" onkeyup="recalc()" id="S" required min="0" max="100"/>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row" style="margin-top: 0.7%;">
        <div class="col-4"></div>
        <div class="col-4 "><input name="subject[]" class="rounded-input" type="text" placeholder="Предмет"
                                   style="width:60%;"/>
            <input name="mark[]" class="rounded-input align-self-end" type="number" placeholder="Кол-во"
                   style="width:30%; margin-left: 5%;" value="0" onkeyup="recalc()" id="T" min="0" max="100"/></div>
        <div class=" col-4">
        </div>
    </div>
    <div class="row" style="margin-top: 0.7%;">
        <div class="col-4"></div>
        <div class="col-4 "><input name="subject[]" class="rounded-input" type="text" placeholder="Предмет"
                                   style="width:60%;"/>
            <input name="mark[]" class="rounded-input align-self-end" type="number" placeholder="Кол-во"
                   style="width:30%; margin-left: 5%;" value="0" onkeyup="recalc()" id="FO" min="0" max="100"/></div>
        <div class=" col-4">
        </div>
    </div>
    <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
    <div class="row" style="margin-top: 0.7%;">
        <div class="col-4"></div>
        <div class="col-4 ">Скан. паспорта: <input name="passport" type="file" required/></div>
        <div class="col-4"></div>
    </div>
    <div class="row" style="margin-top: 0.7%;">
        <div class="col-4"></div>
        <div class="col-4 ">СНИЛС: <input name="snils" type="file" required/></div>
        <div class="col-4"></div>
    </div>
    <div class="row" style="margin-top: 0.7%;">
        <div class="col-4"></div>
        <div class="col-4 ">Диплом: <input name="graduate" type="file" required/></div>
        <div class="col-4"></div>
    </div>
    <div class="row" style="margin-top: 0.7%;">
        <div class="col-4"></div>
        <div class="col-4 ">Результаты ЕГЭ: <input name="results" type="file" required/></div>
        <div class="col-4"></div>
    </div>
    <div class="row" style="margin-top: 0.7%;">
        <div class="col-4"></div>
        <div class="col-4 ">
            <button type="submit" class="btn btn-warning btn-rounded" style="width: 40%; margin-left: 30%;">Отправить
            </button>
        </div>
        <div class="col-4"></div>
    </div>
</form>

<script type="text/javascript">
    var recalc = function () {
        const F = Number(document.getElementById("F").value);
        const S = Number(document.getElementById("S").value);
        const T = Number(document.getElementById("T").value);
        const FO = Number(document.getElementById("FO").value);

        var calc = F + S + T + FO;

        document.getElementById("total").value = calc;
    }
</script>