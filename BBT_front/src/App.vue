
<template>
  <div class="container">
    <select class="form-select m-5" aria-label="Default select example" v-model="season"  @change="sortBySeason(season)">
      <option v-for="num in epNums" :value="num">{{ num }}</option>
    </select>
    <div class="row ">
      <div v-for="episode in episodes" class="col-md-3">
        <div class="card mb-1" style="height: 30rem;">
          <img :src="episode.imageoriginal" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{ episode.name }}</h5>
            <div>
              <span v-html="episode.summary" class="card-text"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import axios from 'axios';
import { ref } from 'vue';

const episodes = ref([])
const epNums = ref([])

async function getEpisodes() {
  let res = await axios.get('http://127.0.0.1:8000/api/episodes')
  episodes.value = res.data
  console.log(episodes.value)

  episodes.value.forEach(element => {
    if (!epNums.value.includes(element.season))
    {
      epNums.value.push(element.season)
    }
  });



}

getEpisodes()


async function sortBySeason(season){
  let res = await axios.get('http://127.0.0.1:8000/api/episodes/' + season)
  episodes.value = res.data

}



</script>

<style scoped>
p {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
</style>
