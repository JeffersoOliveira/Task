<script setup>
import axios from "axios";
import {ref} from 'vue';

const tasks = ref()

axios.get('tasks')
    .then((response) => {
      tasks.value = response.data.data
    })

function atualizaTask(task) {
  const data = {
    "id": task.id,
    "titulo": task.titulo,
    "descricao": task.descricao,
    status: !task.status
  }
  axios.put('tasks/atualiza/' + task.id, data)
      .then((response) => {
        task.status = response.data.status
      })
}

function deletaTask(task) {

  axios.delete('tasks/delete/' + task.id)
      .then((response) => {
        if (response.status === 204){
          axios.get('tasks')
              .then((response) => {
                tasks.value = response.data.data
              })
        }
      })


}

</script>

<template>
  <!-- TABELA -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">

        <div class="card mt-2" v-for="task in tasks" :key="task.id">
          <div class="card-body">
            <h5 class="card-title">{{ task.titulo }}</h5>
            <p class="card-text">{{ task.descricao }}</p>
            <button @click="atualizaTask(task)" title="Redefinir Task" class="btn" v-if="task.status">
              <span style="color: rgb(0, 190, 0);" class="material-symbols-outlined">
              check_circle
              </span>
            </button>
            <button @click="atualizaTask(task)" title="Concluir Task" class="btn" v-if="!task.status">
              <span style="color: rgb(41, 45, 255);" class="material-symbols-outlined">
              autorenew
              </span>
            </button>

            <button @click="deletaTask(task)" title="Deletar Task" class="btn">
              <span  class="material-symbols-outlined">
              delete
              </span>
            </button>

          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<style>
.card-body{
  padding: 2px 16px 5px 16px;
}
p.card-text{
  margin-bottom: 5px;
}
</style>