<script>
// eslint-disable-next-line vue/no-export-in-script-setup

import axios from "axios";
import { ref } from 'vue';
export default {
  name:"CadastroForm",
  data(){
    return{
      titulo: null,
      descricao:  null
    }
  },
  methods:{
    async criarTask(e){
      e.preventDefault();
      const data = {
        titulo: this.titulo,
        descricao:  this.descricao,
        status: false
      }

      axios.post('tasks', data)
          .then((response) => {
            this.titulo = "";
            this.descricao = "";
            this.$router.push('/tasks');

          })

    }
  }

}

function cadastraTask(task) {
  // console.log(task)
  // const data = {
  //   "id": task.id,
  //   "titulo": task.titulo,
  //   "descricao": task.descricao,
  //   status: !task.status
  // }
  console.log(task)
  axios.post('tasks', task)
      .then((response) => {
        task.status = response.data.status
      })
}
</script>
<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8 mt-4">
        <h4>Cadastro de task</h4>
      </div>
    </div>
    <div class="row justify-content-center " id="form">
      <div class="col-8 mt-2">
        <form id="criarTask" @submit="criarTask">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Titulo:</label>
          <input type="text" class="form-control" v-model="titulo" name="titulo" id="titulo" placeholder="Insira seu Titulo">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Descrição:</label>
          <textarea class="form-control" v-model="descricao" name="descricao" id="descricao" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary btn-lg">Inserir</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</template>

<style scoped>
</style>
