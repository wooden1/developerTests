// TODO: create btn to fill total cost of goods sold
const BiddingCalculator = (function () {
  ;('use strict')
  const bid_info = []
  const addRowButton = document.querySelector('.add-row')
  // grabbed this one to copy the innerHTML to clean up that long str
  const costOFGoodsRow = document.querySelector('#cost-of-goods-sold')
  const totalOverhead = document.querySelector('#total-overhead')
  const totalCostOFGoods = document.querySelector('#total-cost-of-goods-sold')
  const profit = document.querySelector('#profit')
  const total = document.querySelector('#total')
  const sumOverheadBtn = document.querySelector('#get-overhead-sum')
  const contratorInfoForm = document.querySelector('#contractor-info_form')

  function eventListeners() {
    addRowButton.addEventListener('click', (event) => {
      // event.preventDefault()
      addRow(event)
    })
    sumOverheadBtn.addEventListener('click', (event) => {
      // event.preventDefault()
      sumOFTotals(event)
    })
  }

  // FIXME: get add row working again
  function addRow() {
    const newRow = document.createElement('div')
    newRow.classList.add('cost-for-goods-sold')
    newRow.innerHTML = costOFGoodsRow.innerHTML
    return contratorInfoForm.appendChild(newRow)
  }
  // TODO: get values from cost for goods to fill total cost
  function sumOfGoodsSold() {
    return (totalCostOFGoods.value = parseFloat(costForGoodsRow))
  }
  function sumOFTotals() {
    return (total.value =
      parseFloat(totalOverhead) +
      parseFloat(sumOfGoodsSold()) +
      parseFloat(profit))
  }

  eventListeners()

  // pseudo code for connecting to backend api

  const url = 'http://backend-api.com/contract-bid_calculator-data.json'
  const bidForm = document.querySelector('.bid-form')
  const BidCalculatorPostData = {
    contractorName: name,
    contractorEmail: email,
    contractorIndustry: industry,
    contractorCostForGoodsSold: costForGoodsSold,
    contractorTotalOverhead: overhead,
    contractorTotalCostForGoodsSold: TotalCostForGoodsSold,
    contractorProfit: profit,
    contracorOverheadSum: overheadSum,
  }
  // send data to backend
  const postReq = {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(BidCalculatorPostData),
  }

  function listener(event) {}
  // ping server
  function status(response) {
    if (response.status >= 200 && response.status < 300) {
      return Promise.resolve(response)
    }
    return Promise.reject(new Error(response.statusText))
  }

  // checks that response status is greenlit
  function checkStatus(response) {
    if (response.ok) {
      return Promise.resolve(response)
    }
    return Promise.reject(new Error(response.statusText))
  }

  // takes a url and checks for ok status, then returns json data
  function fetchData(url) {
    return fetch(url)
      .then(checkStatus)
      .then((res) => res.json())
  }
  function doSomethingwithThis() {
    console.log('do something with data')
  }
  // post data to tbe backend
  fetch(url, postReq)
    .then((response) => {
      if (!status(response)) {
        console.log('bad request')
      }
      return response.json()
    })
    .then((data) => {
      doSomethingwithThis(data)
    })
    .catch((err) => {
      console.log(err)
    })
})()
