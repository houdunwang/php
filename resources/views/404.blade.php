<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/vue"></script>
    <!-- 会使用最新版本，你最好指定一个版本 -->
    <script src="https://unpkg.com/naive-ui"></script>
    <title>Document</title>
</head>

<body>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100vw;
            height: 100vh;
            background-color: #f3f3f3;
        }

        #app {
            transform: scale(1.2);
        }
    </style>
    <div id="app">
        <n-result status="404" title="404 {{$message??'资源不存在'}}" description="生活总归带点荒谬" />
    </div>
    <script>
        const App = {
            setup() {
                return {}
            }
        }
        const app = Vue.createApp(App)
        app.use(naive)
        app.mount('#app')
    </script>
</body>

</html>
