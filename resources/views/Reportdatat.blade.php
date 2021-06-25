
    <form action=" {{route('routef')}}" method="POST" >
      @csrf
      <input class="datepicker" type="date" placeholder="Select date" name="dateFrom" >
      <input class="datepicker" type="date" placeholder="Select date" name="dateTo" >

      <button type="submit" class="btn btn-primary" name="saleyear" value="submit">Export Excel Sales By Year</button>
      <button type="submit" class="btn btn-primary" name="salemonth" value="submit">Export Excel Sales By Month</button>
      <button type="submit" class="btn btn-primary" name="saleday" value="submit">Export Excel Sales By Days</button>

      <button type="submit" class="btn btn-primary" name="offeryear" value="submit">Export Excel Offers By Year</button>
      <button type="submit" class="btn btn-primary" name="offermonth" value="submit">Export Excel Offers By Month</button>
      <button type="submit" class="btn btn-primary" name="offerday" value="submit">Export Excel Offers By Days</button>

      <button type="submit" class="btn btn-primary" name="invoiceyear" value="submit">Export Excel Invoices By Year</button>
      <button type="submit" class="btn btn-primary" name="invoicemonth" value="submit">Export Excel Invoices By Month</button>
      <button type="submit" class="btn btn-primary" name="invoiceday" value="submit">Export Excel Invoices By Days</button>


      <button type="submit" class="btn btn-primary" name="saleyearC" value="submit">Chart Sales By Year</button>
      <button type="submit" class="btn btn-primary" name="salemonthC" value="submit">Chart Sales By Month</button>
      <button type="submit" class="btn btn-primary" name="saledayC" value="submit">Chart Sales By Days</button>

      <button type="submit" class="btn btn-primary" name="offeryearC" value="submit">Chart Offers By Year</button>
      <button type="submit" class="btn btn-primary" name="offermonthC" value="submit">Chart Offers By Month</button>
      <button type="submit" class="btn btn-primary" name="offerdayC" value="submit">Chart Offers By Days</button>

      <button type="submit" class="btn btn-primary" name="invoiceyearC" value="submit">Chart Invoices By Year</button>
      <button type="submit" class="btn btn-primary" name="invoicemonthC" value="submit">Chart Invoices By Month</button>
      <button type="submit" class="btn btn-primary" name="invoicedayC" value="submit">Chart Invoices By Days</button>


<button type="submit" class="btn btn-primary" name="save" value ="save">Save Note</button>
</form>