<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>表單資料</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  
 </head>
 <body>
  <div class="container" id="App">
   <br />
   <h3 align="center">表單資料</h3>
   <br />
   <div class="panel panel-default">
    
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-bordered table-striped">
       <tr>
        <th>公司</th>
        <th>姓名</th>
        <th>性別</th>
        <th>興趣</th>
        <th>Email</th>
        <th>手機</th>
        <th>留言</th>
        <th>Delete</th>
       </tr>
       <tr v-for="row in allData">
        <td>{{ row.company }}</td>
        <td>{{ row.name }}</td>
        <td>{{ row.sex }}</td>
        <td>{{ row.hobby }}</td>
        <td>{{ row.email }}</td>
        <td>{{ row.phone }}</td>
        <td>{{ row.msg }}</td>
        <td><button type="button" name="delete" class="btn btn-danger btn-xs delete" @click="deleteData(row.id)">Delete</button></td>
       </tr>
      </table>
     </div>
    </div>
   </div>
   
  </div>
 </body>
</html>


<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>

    var application =new Vue({
        el:'#App',
        data:{
            allData:'',
        },
        methods:{
            fetchAllData:function(){
                axios.post('action.php', {
                    action:'fetchall'
                }).then(function(response){
                    application.allData = response.data;
                    //alert(response.data.name);
                });
            },
        
            deleteData:function(id){
                if(confirm("確定要刪除嗎?"))
                {
                    axios.post('action.php', {
                    action:'delete',
                    id:id
                    }).then(function(response){
                    application.fetchAllData();
                    alert(response.data.message);
                    });
                }
            }
        },
        created:function(){
        this.fetchAllData();
        }
    });

</script>