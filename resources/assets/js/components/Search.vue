<template>
      <div class="container">
            <div class="row">
                  <div class="col-lg-6 col-lg-offset-3">
                        <input type="text" class="form-control" placeholder="search for other users" v-model="query" @keyup.enter="search()">
                        <br>
                        <div class="row" v-if="results.length">
                              <div class="text-center" v-for="user in results">
                                    <img :src="user.avatar" alt="" width="50px" height="50px" class="searched-user">
                                    <a :href="profile_url(user.slug)">
                                          <h4 class="text-center">{{ user.name }}</h4>
                                    </a>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</template>

<script>
      var algoliasearch = require('algoliasearch')

      var client = algoliasearch('LLHKL57BSI', '283620489335513a177c9446e7736218')

      var index = client.initIndex('users')

      export default {
            mounted() {
                  
            },
            data() {
                  return {
                        query: '',
                        results: []
                  }
            },
            methods: {
                  search() {
                        index.search(this.query, (err, content) => {
                              this.results = content.hits
                        })
                  }
            },
             computed: {
                   profile_url(slug) {

                         const url = "http://127.0.0.1:8000/profile/"

                         return url + slug
                         
                   }
             }
      }
</script>

<style>
      .searched-user{
            border-radius: 50%;
      }
</style>