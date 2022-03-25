<table class='sw-text-editor-table' style='border: 1px solid black; border-collapse: collapse;'>
    <thead class='sw-text-editor-table__head' style='border: 1px solid black; border-collapse: collapse;'>
    <tr class='sw-text-editor-table__row'>
      
         <td class='sw-text-editor-table__col' style='border: 1px solid black; border-collapse: collapse;'>Email</td>
         <td class='sw-text-editor-table__col' style='border: 1px solid black; border-collapse: collapse;'>Title</td>
         <td class='sw-text-editor-table__col' style='border: 1px solid black; border-collapse: collapse;'>Firstname</td>
         <td class='sw-text-editor-table__col' style='border: 1px solid black; border-collapse: collapse;'>Lastname</td><td class='sw-text-editor-table__col' style='border: 1px solid black; border-collapse: collapse;'>Zipcode</td>
         <td class='sw-text-editor-table__col' style='border: 1px solid black; border-collapse: collapse;'>City</td><td class='sw-text-editor-table__col' style='border: 1px solid black; border-collapse: collapse;'>Street</td>
         <td class='sw-text-editor-table__col' style='border: 1px solid black; border-collapse: collapse;'>Status</td>
      
    </tr>

       
    </tr>
    </thead>

    <tbody>
    @foreach ($recipients as $value)
        <tr class='sw-text-editor-table__row'>
       
        
            <td class='sw-text-editor-table__col' style='border: 1px solid black; border-collapse: collapse;'>
           {{ $value->email }}
        </td>

         <td class='sw-text-editor-table__col' style='border: 1px solid black; border-collapse: collapse;'>
           {{ $value->title }}
        </td>
         <td class='sw-text-editor-table__col' style='border: 1px solid black; border-collapse: collapse;'>
           {{ $value->firstName }}
        </td> <td class='sw-text-editor-table__col' style='border: 1px solid black; border-collapse: collapse;'>
           {{ $value->lastName }}
        </td>


       
            <td class='sw-text-editor-table__col' style='border: 1px solid black; border-collapse: collapse;'>
           {{ $value->zipCode }}
        </td>

         <td class='sw-text-editor-table__col' style='border: 1px solid black; border-collapse: collapse;'>
           {{ $value->city }}
        </td>
         <td class='sw-text-editor-table__col' style='border: 1px solid black; border-collapse: collapse;'>
           {{ $value->street }}
        </td> 
        <td class='sw-text-editor-table__col' style='border: 1px solid black; border-collapse: collapse;'>
           {{ $value->status }}
        </td>
        
    </tr>
    @endforeach
    
    </tbody>
</table>
