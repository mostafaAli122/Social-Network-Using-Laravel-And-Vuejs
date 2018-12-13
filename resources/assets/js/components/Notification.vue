<template>
    <div>
    </div>
</template>

<script>
    export default{
        ready() {
            this.listen()
        },
        props:['id'],
        methods:{
            listen(){
                Echo.private('App.User'+this.id)
                    .notification((notification)=>{
                        alert('new notification')
                        console.log(notification)
                    })
            }
        }
    }
</script>