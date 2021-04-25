<html>

<head>
    <title>{title}</title>
    <style>
        td {
            border: 1px green dashed;
            padding: 5px;
            max-lines: 5;
        }

        img {
            max-width: 100px;
        }
    </style>
</head>

<body>
    <h3>{heading|upper}</h3>

    <table>
        <tbody>
            {ecoles}
            <tr>
                <td>{id}</td>
                <td>{nom}</td>
                <td><a href="{siteweb}" target="_blank" rel="noopener noreferrer">
                        {siteweb}
                    </a></td>
                <td><img src="/{chemin}" alt="{img}"></td>
                <td>{infos}</td>
            </tr>
            {/ecoles}
        </tbody>
    </table>
    {pager|links()}
</body>

</html>