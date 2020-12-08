const bid_calculator_form = (function () {
  'use strict'
  const bid_info = []
  function getBid() {
    document
      .querySelector('.bid_submit_btn')
      .addEventListener('click', (event) => {
        event.preventDefault()
        // collect data from form fields
        const elements = document.querySelectorAll('input')
        // map over nodelist to return list of input elements
        return bid_info.map.call(elements, (el) => el.value)
      })
  }
  function addRow() {
    document.querySelector('.add-row').addEventListener('click', (event) => {
      const newRow = document.createElement('div')
      newRow.className = 'costs-of-goods'
      newRow.innerHTML = `<label for="cost-of-goods">Cost of goods sold:</label><input type="text" id="cost-of-goods"
  name="cost-of-goods"></input>`
      const newField = document.querySelector('.form-container-one')
      event.preventDefault()
      return newField.appendChild(newRow)
    })
  }
  addRow()

  function sumOFTotals() {
    const totalOverhead = document.querySelector('#total-overhead').value
    const goodsSoldTotal = document.querySelector('#total-cost-of-goods-sold')
      .value
    const profit = document.querySelector('#profit').value
    const total = document.querySelector('#total')
    const sum =
      parseInt(totalOverhead) + parseInt(goodsSoldTotal) + parseInt(profit)
    document.querySelector('#get-total').addEventListener('click', () => {
      return (total.value = sum)
    })
  }
  sumOFTotals()
})()
