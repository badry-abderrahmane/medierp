<template lang="html">
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-6">
          <div>
              <label>Category</label>
              <select class="form-control" v-model="optiongroup">
                    <option v-for="(options,index) in optiongroups" v-bind:value="index"> {{ options }}</option>
              </select>
          </div>
      </div>
      <div v-bind:class="[{'has-danger': value.errors.get(name)} ,' col-md-6']">
          <div>
              <label>{{ label }}</label>
              <select class="form-control" :name="name"
                                          v-bind:class="[{'form-control-danger': value.errors.get(name)} ,'form-control  m-input']"
                                          v-model="value[name]" @change="value.errors.clear(name)">
                    <option v-for="item in list" v-bind:value="item.id" v-if="optiongroup == item.category.id">
                         {{ item.name }}
                    </option>
              </select>
              <div class="form-control-feedback" v-if="value.errors.has(name)" v-text="value.errors.get(name)"></div>
          </div>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  props:["value","name","list","label"],
  data(){
    return {
        optiongroup:''
    }
  },
  computed:{
    optiongroups:function(){
      let array = [];
      this.list.map(function(val,key){
        array[val.category.id] = val.category.name;
      });
      return array;
    }
  },
  methods:{

  }
}
</script>

<style lang="css">
</style>
