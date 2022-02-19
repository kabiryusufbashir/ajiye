<template>
    <div class="grid grid-cols-2 gap-4 my-2">
        <div>
            <label for="account_id" class="text-lg font-medium">Account *</label><br>
            <select v-model="account" @change="getSubaccount()" required name="account_id" value="{{old('account_id')}}" placeholder="Account" class="input-field">
                <option value="0">--Select Account--</option>
                <option class="py-2" v-for="data in accounts" :value="data.id" :key="data.id">{{ data.account_name }}</option>
            </select>
        </div>
        <div>
            <label for="accountcategory_id" class="text-lg font-medium">Sub Account</label><br>
            <select v-model="accountSubAccount" name="accountcategory_id" value="{{old('accountcategory_id')}}" placeholder="Sub Account" class="input-field">
                <option value="0">--Select Sub Account--</option>
                <option class="py-2" v-for="data in accountSubAccounts" :value="data.id" :key="data.id">{{ data.account_category_name }}</option>
            </select>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'SubAccount',
        data(){
            return{
                account: 0,
                accounts: [],
                accountSubAccount: 0,
                accountSubAccounts: []
            }
        },
        methods:{
            getAccount(){
                axios.get('/api/getAccount').then(response => {
                    this.accounts = response.data
                }).catch(error => {
                    console.log(error)
                })
            },
            getSubaccount(){
                axios.get('/api/getSubaccount', {
                    params:{
                        account_id: this.account
                    }
                }).then(response => {
                    this.accountSubAccounts = response.data
                }).catch(error => {
                    console.log(error)
                })
            }
        },
        created(){
            this.getAccount()
        }
    }
</script>