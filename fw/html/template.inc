   <lezaz:if  condetion="@lezaz:table1sql(count)==1">
        <lezaz:if condetion="1==1">
            bassam
        </lezaz:if>
        yes 
        <lezaz:else/>
        no
    </lezaz:if>

<lezaz:each id="eachid" variable="array1" type="session">
    good each ,mam lezaz~#eachid(key) lezaz~#eachid(value) lezaz~#eachid(counter)
</lezaz:each>


<lezaz:sql id="table1sql" type="sql" sql="select * from table1 where id=@lezaz:var(bassam)" >
    <lezaz:var name="bassam" />
    @lezaz:table1sql(count)
    <lezaz:if type="if" condetion="@lezaz:table1sql(count)==1">
        <lezaz:var name="bassam" />
        <lezaz:if condetion="1==1">
            bassam<lezaz:var name="bassam" />
        </lezaz:if>
        yes 
        <lezaz:else/>
        no
    </lezaz:if>

</lezaz:sql>

   