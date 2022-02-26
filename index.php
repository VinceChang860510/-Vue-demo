<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>以Vue建置Form表單</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
        span {
            color: #f00;
        }
        .center{
            text-align:center;
        }
        
    </style>
</head>

<body>
    <div class="container" id="crudApp">
        <br />
        <h3 align="center">表單填寫</h3>
        <br />
        <div class="panel panel-default">

            <div id="app" class="center">
                    <!-- 意見表單 -->
                <form @submit.prevent="send">

                    
                    <label for="company">公司：</label>
                    <input type="text" v-model="info.company"><br><br>

                    <label for="name">姓名<span>*</span>：</label>
                    <input type="text" v-model="info.name"><br><br>

                    性別<span>*</span>：
                    男<input type="radio" name="sex" v-model="info.sex" value="male">
                    女<input type="radio" name="sex" v-model="info.sex" value="female"><br><br>

                    興趣：
                    遊戲<input type="checkbox" name="hobby" v-model="info.hobby" value="遊戲">
                    運動<input type="checkbox" name="hobby" v-model="info.hobby" value="運動">
                    音樂<input type="checkbox" name="hobby" v-model="info.hobby" value="音樂"><br><br>

                    <label for="email">Email<span>*</span>：</label>
                    <input type="email" v-model="info.email" name="email"><br><br>

                    <label for="phone">手機<span>*</span>：</label>
                    <input type="text" v-model="info.phone" name="phone"><br><br>


                    <label for="msg">留言<span>*</span>：</label>
                    <textarea id="msg" rows="3" v-model="info.msg"></textarea><br><br>

                    <input type="checkbox" name="agree" v-model="info.agree">已閱讀隱私權政策並接受<br><br>

                    <div>
                        <button class="">送出</button> &nbsp;&nbsp;
                        <button type="reset"> 重置</button>
                    </div>
                    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">   <!-- 未來新增google recaptcha用 --> 
                    <input type="hidden" name="action" value="validate_captcha">                   <!-- 未來新增google recaptcha用 --> 
                </form>
                
            </div>
        </div>
    </div>

    <script src="js/vue.global.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        const re = new RegExp('^09\\d{8}$'); 

        let vm = Vue.createApp({
            el: '#form',
            data() {
                return {
                    info: {
                        company: "",
                        eamil: "",
                        sex: "male",
                        hobby: [],
                        name: "",
                        phone: "",
                        msg: "",
                        agree: "",
                    },

                }
            },
            watch: {
                "info.hobby": function () {
                    
                },
            },
            methods: {
                send(){
                    let pass = "yes";
                    if (this.info.agree!=true){
                        alert("請同意隱私權政策");
                        pass = "no";
                        return false;
                    }

                    if(!this.info.name){
                        alert("請輸入姓名");
                        pass = "no";
                        return false;
                    }

                    if(!this.info.phone){
                        alert("請輸入手機號碼");
                        pass = "no";
                        return false;
                    }

                    // if (this.info.phone.match(re) ){   
                    // }else {
                    //     alert('手機格式有誤，ex:0912345678');
                    //     pass = "no";
                    //     return false;
                    // }

                    if(!this.info.email){
                        alert("請輸入email");
                        pass = "no";
                        return false;
                    }

                    if(!this.info.msg){
                        alert("請留言");
                        pass = "no";
                        return false;
                    }

                    

                    if(pass == 'yes'){
                          
                        let personForm = vm.toFormData(vm.info);
                        axios.post('jquery.realperson.php', personForm)
                            .then( function(response) {
                                console.log(response.data);
                                alert('新增成功');
                                window.location.reload();
                            });
                    }
                    
                },
                toFormData: function(obj) {
                    let formData = new FormData();
                    for(let key in obj) {
                        formData.append(key, obj[key]);
                    }
                    return formData;
                }
            },
        }).mount("#app");
    </script>
</body>

</html>