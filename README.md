一个api接口框架，lumen5.5+Dingo API2.2+jwt-auth 1.0.0-rc.4.1 ，实现无痛刷新token，接口版本管理的模子

composer install 安装依赖


登录例子在
api/auth/login

我
api/auth/me

逻辑是 
前端请求头  设置 Accept   application/vnd.lumentest.v1+json  登录后
需要设置 	Authorization 
Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sdW1lbi10ZXN0LmNvbVwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU2MDI0MTg0OCwiZXhwIjoxNTYwMjQxOTA4LCJuYmYiOjE1NjAyNDE4NDgsImp0aSI6IjJwUG9oZFEwN2M2QjFMUWMiLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.aAMPQ5Nh9is3HbJaFTWyj84QOaolCCbsFQIINu7gNqI
才能请求带权限的接口

App\Http\Middleware\Authenticate
中间件实现了无痛刷新功能  基于旧token失效后  黑名单生效时间1分钟  也就是旧token入黑名单1分钟后才失效，配置文件可配置

你可能需要
php artisan jwt:secret
生成自己的jwt key


resources/views/demo.html下有前端调用例子，可自己封装ajax方法来实现调用接口公共代码部分
