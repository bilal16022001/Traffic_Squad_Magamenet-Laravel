<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     <h1>multi lang</h1>
     <select class="lang_change">
         <option value="en" {{session()->get("locale") == "en" ? "selected" : ""}}>english</option>
         <option value="fr" {{session()->get("locale") == "fr" ? "selected" : ""}}>french</option>
     </select>
     <h2>{{__("main.title_dashbaord")}}</h2>
</body>
<script type="text/javascript">

let url = "{{route('lang_change')}}";
document.querySelector(".lang_change").addEventListener("change",()=>{
     window.location.href = url + "?lang=" + document.querySelector(".lang_change").value;
})

</script>
</html>