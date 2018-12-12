<template>
    <div class="container">
        <div class="row">
            <p class="text-center" v-if="loading">
                Loading...
            </p>
            <p class="text-center" v-if="!loading">
                <button class="btn btn-success" v-if="status==0">Add Friend</button>
                <button class="btn btn-success" v-if="status=='pending'">Accept Friend</button>
                <span class="text-center" v-if="status=='waiting'">Waiting For Response </span>
                <span class="text-center" v-if="status=='friends'">Friends </span>
                
            </p>     
        </div>
    </div>
</template>

<script>
    export default {
        ready() {
            this.$http.get('/check_relationship_status/'+this.profile_user_id)
            .then((resp)=>{
                console.log(resp)
                this.status=resp.body.status
                this.loading = false
            })
        },
        props:['profile_user_id'],
        data(){
            return {
                status: '',
                loading: true
            }
        }
    }
</script>
