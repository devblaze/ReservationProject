<!--<template>-->
<!--    <div class="container">-->

<!--    </div>-->
<!--</template>-->

<!--<script>-->
<!--var canvas = new fabric.Canvas('c');-->
<!--$("#create").click(function () {-->
<!--    if ($("#Row").val() != 0 && $("#Col").val() != 0) {-->
<!--        var nextRow = 0;-->
<!--        var nextCol = 0;-->
<!--        for (var r = 0; r < $("#Row").val(); r++) {-->
<!--            nextRow = 0;-->
<!--            console.log("row:"+r);-->
<!--            for (var c = 0; c < $("#Col").val(); c++) {-->
<!--                console.log("col:"+c);-->
<!--                var name = "Row:" + r + "-Col:" + c;-->
<!--                var rect = new fabric.Rect({-->
<!--                    width: 50,-->
<!--                    height: 50,-->
<!--                    left: 100 + nextRow,-->
<!--                    top: 100 +nextCol,-->
<!--                    fill: 'grey',-->
<!--                    scaleY: 0.5,-->
<!--                    id:name,-->
<!--                    originX: 'center',-->
<!--                    originY: 'center'-->
<!--                });-->
<!--                nextRow = nextRow + 60;-->
<!--                canvas.add(rect);-->
<!--            }-->
<!--            nextCol = nextCol+35;-->
<!--        }-->
<!--    }-->
<!--});-->
<!--$("#save").click(function () {-->
<!--    var tmp = {};-->
<!--    var seats = [];-->

<!--    var canvasObjects = canvas.getObjects();-->
<!--    for (obj in canvasObjects) {-->
<!--        if (canvasObjects[obj].get('type') == 'rect') {-->
<!--            tmp.top = canvasObjects[obj].get('top');-->
<!--            tmp.left = canvasObjects[obj].get('left');-->
<!--            tmp.Name = canvasObjects[obj].get('id');-->
<!--            seats.push(tmp);-->

<!--            tmp = {};-->
<!--        }-->
<!--    }-->
<!--    console.log(JSON.stringify(seats));-->
<!--    $.ajax(-->
<!--        {-->
<!--            type: "post",-->
<!--            url: '@Url.Action("CreateTableMap", "Seat",new { subAreaId = ViewBag.subAreaId })',-->
<!--            dataType: 'json',-->
<!--            contentType: 'application/json; charset=utf-8',-->
<!--            data: JSON.stringify(seats),-->
<!--            success: function (data) { alert("saved"); },-->
<!--            error: function (data) { alert("fail to save");},-->
<!--            accept: 'application/json'-->
<!--        })-->
<!--});-->
<!--</script>-->
