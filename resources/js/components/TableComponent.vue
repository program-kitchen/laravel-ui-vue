<template>
  <div>
    <table
      class="table table-striped mt-5 w-75 mx-auto"
      style="table-layout: fixed"
    >
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Title</th>
          <th scope="col">Contents</th>
          <th scope="col">Others</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>テスト</td>
          <td>テストコンテンツです</td>
          <td>特に特記事項ありません</td>
        </tr>
        <tr>
          <td>2</td>
          <td>テスト</td>
          <td>テストコンテンツです</td>
          <td>特に特記事項ありません</td>
        </tr>
        <tr>
          <td>3</td>
          <td>テスト</td>
          <td>テストコンテンツです</td>
          <td>特に特記事項ありません</td>
        </tr>
      </tbody>
    </table>
    <input type="text" v-model="postalCode" />
    <button @click="getAdress()">APIコールテスト</button>
    <p>{{ address }}</p>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      postalCode: "",
      address: "",
    };
  },
  mounted() {
    console.log("マウントされました");
  },
  methods: {
    async getAdress() {
      await axios
        .get(
          `https://apis.postcode-jp.com/api/v4/postcodes/${this.postalCode}?apiKey=nfssvafHfXGWsplNuRMQjcmCXiqcGIMzinBeyEb`
        )
        .then((response) => {
          // alert('Jsonを確認する！');
          console.log(response.data);
          this.address = response.data[0].allAddress;
        });
    },
  },
};
</script>
