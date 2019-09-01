<template>
  <v-app>
    <v-container>
      <v-flex xs12 sm6 offset-sm3>
        <v-card>
          
            <v-layout justify-center column>
              <v-text-field
              ref="input"
              v-model="newItem.content"
              :rules="inputRule"
              label="write something !"
              outline
              clearable
              ></v-text-field>
              <v-btn block color="grey" @click="addToChecklist()"
              >Add</v-btn>
            </v-layout>
          
          <v-list>
            <v-list-tile
              v-for="item in items"
              :key="item.title"
            > 
              <v-list-tile-action>
                <v-checkbox 
                  v-model="item.checked" 
                  @change="updateChecklistItem(item)">
                </v-checkbox>
              </v-list-tile-action>
              <v-text-field
                  v-model="item.content"
                  @change="updateChecklistItem(item)">{{item.content}}</v-text-field>
              <v-list-tile-action>
                <v-btn fab flat small color="error" @click="deleteChecklistItem(item.id)">
                  <v-icon>delete</v-icon>
                </v-btn>
              </v-list-tile-action>
            </v-list-tile>
          </v-list>
        </v-card>
      </v-flex>
    </v-container>
  </v-app>
</template>
<script>

import axios from 'axios';

export default {
    data: () => ({
      items: [],
      newItem: { 'content': '','checked': false},
      inputRule: [v => !!v || 'Field required']
    }),

    mounted() {
      this.getChecklist();
    },
    
    methods: {
      addToChecklist(){ 
        if(this.$refs.input.validate()){
          axios.post('/', this.newItem).then((response)=>{
            this.getChecklist();
            // console.log(response);
          });
        }
        this.newItem = {};      
      },

      updateChecklistItem(item){
        axios.put('/', item).then((response)=>{
          this.getChecklist();
          // console.log(response);
        })
      },

      getChecklist(){
        axios.get('/').then((response)=>{
          this.items = response.data;
          // console.log(response)
        });
      },

      deleteChecklistItem(item){
        axios.delete('/'+item).then((response)=>{
          this.getChecklist();
          // console.log(response);
        });
      } 
    },
  
  }
</script>