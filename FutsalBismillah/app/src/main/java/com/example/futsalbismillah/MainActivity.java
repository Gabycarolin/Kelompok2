package com.example.futsalbismillah;

import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);
    }

    //membuat menu
    @Override
    public boolean onCreateOptionsMenu(Menu menu){
        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.bottomnavigation_menu,menu);
        return true;
    }

    //membuat pilihan menu
    @Override
    public boolean onOptionsItemSelected(MenuItem item){
        if (item.getItemId()==R.id.icon_tiket){
            Intent inte = new Intent(MainActivity.this, tiket.class);
            startActivity(inte);
        }if (item.getItemId()==R.id.icon_akun){
            Intent inte = new Intent(MainActivity.this, Akun.class);
            startActivity(inte);
        }
        return true;
    }
}
