import {Body, Catch, Controller, Delete, Get, HttpException, Param, Post, Put} from '@nestjs/common';
import {UsersService} from "./users.service";

import {Korisnik} from "../entity/Korisnik.entity";

@Controller('users')
export class UsersController {
    constructor(private readonly usersService: UsersService){

    }

    @Get()
    findAll(@Param() param) : Promise<Korisnik[]>{
        return this.usersService.findAll();
    }

    @Get('username/:user')
    findByUsername(@Param() param) : Promise<Korisnik>{
        return this.usersService.findByUsername(param.user);
    }

    @Get(':id')
    findOne(@Param() param): Promise<Korisnik>{
        return this.usersService.findOne(param.id);

    }

    @Post()
    create(@Body() korisnik: Korisnik):  Promise<boolean>{
        return this.usersService.create(korisnik);
    }

    @Delete(':id')
    remove(@Param() param): Promise<boolean>{
        return this.usersService.remove(param.id);
    }

    @Put(':id')
    update(@Body() korisnik: Korisnik, @Param() param ):Promise<boolean>{
        return this.usersService.update(korisnik,param.id);
    }
}
