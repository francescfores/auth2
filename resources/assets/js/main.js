var Vue = require('vue');

var Vue = require('jquery');
/*
new Vue({ //constructor de vue
    el : '#emailFormGroup',
        data : {
        exists : true
    }
})
*/
new Vue({ //constructor de vue
    el : '#email',
    data : {
        exists : true,
        placeholder : "youremail@gmail.com",
        url : "http://auth2.app/checkEmailExists"
    },
    methods:{
        checkEmailExists : function(){
            var email = $('#email').value();
            console.debug('checkEmailExists EXECUTED!');
            console.debug('Apunt de consulta');
            console.debug($this.url);
            var url = this.url + '?email=' + email;
            console.debug(url);
          }
    }
})