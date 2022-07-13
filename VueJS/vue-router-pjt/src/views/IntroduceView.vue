<template>
  <h1>나의 이름은 홍길동 입니다.</h1>
  <input type="number" v-model.number="numberModel">
  {{ printNumber }}
  <div>
    <label>여성<input type="radio" v-model.number="gender" value="0"></label>
    <label>남성<input type="radio" v-model.number="gender" value="1"></label>
  </div>
  <div>
    {{ gender }}  
    {{ printGender }}
  </div>
  <div>
    <h3>p.96</h3>
    <div>{{ htmlString }}</div>
    <div v-html="htmlString"></div>
  </div>
  <hr>
  <div>
    <h3>p.99</h3>
    <textarea v-model="message"></textarea>
  </div>
  <div>
    <h3>p.100</h3>
    <select v-model="city">
      <option value="02">서울</option>
      <option value="21">부산</option>
      <option value="064">제주</option>
    </select>
  </div>
  <div>
    <h3>p.101 - {{ basketball }}, {{ football }}</h3>
    <label><input type="checkbox" v-model="basketball">농구</label>
    <label><input type="checkbox" v-model="football" true-value="1" false-value="0">풋볼</label>
  </div>
  <div>
    <input type="text" v-model="textValue1">
    <input type="text" v-model="textValue2">
    <br>
    <button type="button" v-bind:disabled="textValue1 === '' || textValue1 !== textValue2">전송</button>
  </div>
  <div>
    <h3>p.107</h3>
    <div class="container" v-bind:class="{'active': isActive, 'text-red': hasError}">
      Class Binding
    </div>
    <div class="container" :class="[activeClass, errorClass]">
      Class Binding
    </div>
    <div class="container" :class="clsArr">
      Class Binding
    </div>
  </div>
  <hr>
  <div>
    <h3>p.110</h3>
    <div :style="styleObj">인라인 스타일 바인딩</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      numberModel: 3,
      gender: '0',
      htmlString: '<p style="color:red">This is a red string</p>',
      message: 'textarea입니다.',
      city: '064',
      basketball: true,
      football: '1',
      textValue1: '',
      textValue2: '',
      isActive: true,
      hasError: true,
      activeClass: 'active',
      errorClass: 'text-red',
      clsArr: ['active', 'text-red'],
      styleObj: {
        color: 'red',
        fontSize: '16px'
      },
    }
  },
  computed: {
    printNumber() {
      return this.numberModel + 3;
    },
    printGender() {
      return this.gender === '0' ? '여성' : '남성';
    }
  },
}
</script>

<style>
  .container { width: 100%; height: 200px; }
  .active { background-color: yellow; font-weight: bold; }
  .text-red { color: red; }
</style>